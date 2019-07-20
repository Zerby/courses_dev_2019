// Méthode GET

val t = Thread(Runnable {

    val u = URL("http://perdu.com")
    val c = u.openConnection()
    val input = c.getInputStream()
    val reader = InputStreamReader(input)
    val buffer = BufferedReader(reader)

    runOnUiThread {
    printLn(buffer.readline)
    label.setText(buffer.readText())
    }
})
t.start()


