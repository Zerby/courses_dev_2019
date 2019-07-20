import Foundation
import Kitura
import HeliumLogger
import KituraCompression
import KituraCORS

// log stuff on console
HeliumLogger.use()

let router = Router()

// setup CORS for weirdness removal
let options = Options(allowedOrigin: .all)
let cors = CORS(options: options)

// we want to parse bodies and compress
// static files may be needed at some point
router.all(middleware: [BodyParser(),Compression(), cors, StaticFileServer()])

setupBoardCRUD(router)

Kitura.addHTTPServer(onPort: 8080, with: router)
Kitura.run()
