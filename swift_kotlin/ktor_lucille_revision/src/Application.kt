package com.example

import io.ktor.application.*
import io.ktor.response.*
import io.ktor.request.*
import io.ktor.routing.*
import io.ktor.http.*
import io.ktor.html.*
import kotlinx.html.*
import kotlinx.css.*
import freemarker.cache.*
import io.ktor.freemarker.*
import io.ktor.client.*
import io.ktor.client.engine.apache.*
import io.ktor.http.content.PartData
import io.ktor.http.content.forEachPart
import io.netty.channel.MessageSizeEstimator
import java.util.*
import kotlin.collections.ArrayList


fun main(args: Array<String>): Unit = io.ktor.server.netty.EngineMain.main(args)

@Suppress("unused") // Referenced in application.conf
@kotlin.jvm.JvmOverloads
fun Application.module(testing: Boolean = false) {
    install(FreeMarker) {
        templateLoader = ClassTemplateLoader(this::class.java.classLoader, "templates")
    }

    val client = HttpClient(Apache) {
    }

    class Message(author:String?, contenu:String?){
        val author = author
        val contenu = contenu
    }

    class Board(name:String?){
        val name = name
        val messages = ArrayList<Message>()
    }

    val boards = ArrayList<Board>()


    boards.add(Board("TEST"))

    routing {
        get("/boards") {
            call.respondHtml {
                body {
                    h1 { +"Liste de tous les boards" }
                    ul{
                        for(i in boards){
                            li{
                                a("boards/"+i.name){ +"${i.name}" }
                            }
                        }
                    }
                    p{+"Ajouter un board"}
                    form ("addBoard", method = FormMethod.post){
                        textInput { name = "name" }
                        submitInput { value = "Submit" }
                    }


                }
            }

           // call.respond(FreeMarkerContent("board-form.ftl", null))


        }
        get("boards/{name}"){
            val nameBoard = Board(call.parameters["name"])

            call.respondHtml {
                body{
                    h1{+"Le board ${nameBoard.name}"}
                    p{+"Les messages de ce board :"}
                    ul{
                        for (i in nameBoard.messages){
                            li{
                                +"${i.author}"
                                +"${i.contenu}"
                            }
                        }
                    }

                    form("${nameBoard.name}/addMessage", method = FormMethod.post) {
                        textInput { name = "author" }
                        textInput { name = "contenu" }
                        submitInput { value = "Submit" }
                    }
                }
            }
        }

        post("/addBoard"){
            val data = call.receiveParameters()
            boards.add(Board(data["name"]))
            call.respondRedirect("/boards")
        }

        post("/boards/{name}/addMessage"){
            val data = call.receiveParameters()
            val nameBoard = Board(call.parameters["name"])
            val author = data["author"]
            val contenu = data["contenu"]
            nameBoard.messages.add(Message(author, contenu))
            for (i in nameBoard.messages){

                call.respondHtml {
                    body{
                        p{
                            +"${i.author}"
                            +"${i.contenu}"
                        }
                    }
                }
            }

            // Je n'arrive pas a les passer a la vue donc j'ai enleve la redirection :) 
            //call.respondRedirect("/boards/${nameBoard.name}")

        }




        get("/test") {
            call.respondHtml {
                body {
                    h1 { +"HTML" }
                    ul {
                        for (n in 1..10) {
                            li { +"$n" }
                        }
                    }
                }
            }
        }

        get("/styles.css") {
            call.respondCss {
                body {
                    backgroundColor = Color.red
                }
                p {
                    fontSize = 2.em
                }
                rule("p.myclass") {
                    color = Color.blue
                }
            }
        }

        get("/html-freemarker") {
            call.respond(FreeMarkerContent("index.ftl", mapOf("data" to IndexData(listOf(1, 2, 3))), ""))
        }
    }
}



data class IndexData(val items: List<Int>)

data class MySession(val count: Int = 0)

data class JsonSampleClass(val hello: String)


fun FlowOrMetaDataContent.styleCss(builder: CSSBuilder.() -> Unit) {
    style(type = ContentType.Text.CSS.toString()) {
        +CSSBuilder().apply(builder).toString()
    }
}

fun CommonAttributeGroupFacade.style(builder: CSSBuilder.() -> Unit) {
    this.style = CSSBuilder().apply(builder).toString().trim()
}

suspend inline fun ApplicationCall.respondCss(builder: CSSBuilder.() -> Unit) {
    this.respondText(CSSBuilder().apply(builder).toString(), ContentType.Text.CSS)
}
