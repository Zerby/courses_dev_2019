import Foundation
import Kitura

struct Message : Codable {
    let postDate : Date?
    let postAuthor : String
    let postContents : String
}

struct MessageBoard : Codable {
    struct MessageBoardListing : Codable {
        let boardName : String
        let messageCount : Int
    }
    let boardName : String
    var boardMessages : [Message]

    func getListing() -> MessageBoardListing {
        return MessageBoardListing(boardName: boardName, messageCount: boardMessages.count)
    }
}

// In-Memory "database"

fileprivate var messageBoards = [String:MessageBoard]()

func getBoard(_ bName: String) -> MessageBoard {
    let board : MessageBoard
    if let b = messageBoards[bName] {
        board = b
    } else {
        board = MessageBoard(boardName: bName, boardMessages: [])
        messageBoards[bName] = board
    }

    return board
}

func saveBoard(_ board: MessageBoard) {
    messageBoards[board.boardName] = board
}

func setupBoardCRUD(_ router : Router) {
    router.get("/boards") { request, response, next in
        response.send(Array(messageBoards.keys))

        next()
    }

    router.get("/board/:name") { request, response, next in
        guard let bName = request.parameters["name"] else {
            response.send(status: .methodNotAllowed)
            return
        }

        let board = getBoard(bName)
        response.send(board.getListing())

        next()
    }

    router.get("/board/:name/:messageIdx") { request, response, next in
        guard let bName = request.parameters["name"] else {
            response.send(status: .methodNotAllowed)
            return
        }

        guard let mIdx = Int(request.parameters["messageIdx"] ?? "-1") else {
            response.send(status: .methodNotAllowed)
            return
        }

        let board = getBoard(bName)
        if mIdx >= board.boardMessages.count || mIdx < 0 {
            response.send(status: .methodNotAllowed)
            return
        }

        // TODO : format date, maybe? or just document it
        response.send(board.boardMessages[mIdx])

        next()
    }

    router.post("/board/:name/new") { request, response, next in
        guard let bName = request.parameters["name"] else {
            response.send(status: .methodNotAllowed)
            return
        }
        var board = getBoard(bName)
        var modified = true
        if let d = request.body?.asRaw, let post = (try? JSONDecoder().decode(Message.self, from: d)) {
             board.boardMessages.append(post)
            response.send("OK")
        } else if let d = request.body?.asJSON, let author = d["postAuthor"] as? String, let contents = d["postContents"] as? String {
            // fun fact, if it's a json, it's already decoded
            // TODO : decode date
            let date = Date()

            board.boardMessages.append(Message(postDate: date, postAuthor: author, postContents: contents))
            response.send("OK")
        } else if let d = request.body?.asURLEncoded, let author = d["postAuthor"] as? String, let contents = d["postContents"] as? String {
            // fun fact, the developer didn't understand the documentation
            // TODO : decode date
            let date = Date()

            board.boardMessages.append(Message(postDate: date, postAuthor: author, postContents: contents))
            response.send("OK")
        } else {
            modified = false
            response.send("Element ajouté")
        }

        if modified {
            saveBoard(board)
        }

        next()
    }
}
