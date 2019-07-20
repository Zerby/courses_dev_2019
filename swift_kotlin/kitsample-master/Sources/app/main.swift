import Kitura
import KituraStencil

let router = Router()

router.all(middleware: [BodyParser(), StaticFileServer(path: "./Public")])
router.add(templateEngine: StencilTemplateEngine())

router.get("/") { request, response, next in
	response.send("Hello world")
	next()
}

router.get("/hello/:name") { request, response, next in
	let name = request.parameters["name"] ?? "Unknown Probable Biped"
	response.send("Hello \(name)")
	next()
}

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

struct HelloParams : Codable {
    let name: String
}

struct HelloResponse : Codable {
    let result: String
}

func handleCodableHello(input: HelloParams, output: (HelloResponse?, RequestError?)->Void) {
    output(HelloResponse(result: "Hello \(input.name)"), nil) // no error
}

router.post("/api/chello", handler: handleCodableHello)

router.get("/shello/:name") { request, response, next in
    let name = request.parameters["name"] ?? "Unknown Probable Biped"
    try response.render("Hello.stencil", context: ["name" : name])
}

Kitura.addHTTPServer(onPort: 8080, with: router)
Kitura.run()
