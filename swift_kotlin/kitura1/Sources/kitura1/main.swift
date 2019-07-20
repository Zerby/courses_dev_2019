import Kitura
import KituraStencil

let router = Router()
router.add(templateEngine: StencilTemplateEngine())

router.all(middleware: [BodyParser(), StaticFileServer(path: "./Public")]) // Pour parser toute les données

Kitura.addHTTPServer(onPort: 8080, with: router) // crée un serveur local

// ------------ Affiche "Hello World" sur la route / ------------
router.get("/") { request, response, next in
    response.send("Hello World")
    next()
}

// ------------ En GET affiche le nom sur la route /hello/:name ------------
//router.get("/hello/:name") { request, response, next in
//    let name = request.parameters["name"] ?? "Il faut un paramètre"
//    response.send("Hello \(name)")
//    next()
//}

// let session = URLSession.shared
// let task = session.dataTask(...) {
// d, r, e in
//}
// task.resume()

// ------------ En Post ------------
router.post("/api/hello") { request, response, next in
    if let name = request.body?.asJSON?["name"] {
        response.send(["result": "Hello \(name)"])
    } else if let name = request.body?.asURLEncoded?["name"] {
        response.send(["result": "Hello \(name)"])
    } else {
        response.status(.internalServerError)
    }
    
    next()
}

// ------------ Route pour le fichier Hello.stencil ------------
router.get("/hello/:name") { request, response, next in
    let name = request.parameters["name"] ?? "Il faut un paramètre"
    try response.render("Hello.stencil", context: ["name" : name])
    next()
}

Kitura.run()

//print("Hello, world!")
