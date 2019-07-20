// 11 - Struct
package main

import (
	"fmt"
	"io/ioutil"
	"log"
	"os"
)

func main() {
	// créer un fichier
	file, err := os.Create("L-sample.txt")

	// Afficher erreur
	if err != nil {
		log.Fatal(err)
	}

	// écrire dans le fichier
	file.WriteString("Hi, my name is Frédéric !")
	file.Close()

	// lire dans le fichier

	stream, err := ioutil.ReadFile("L-sample.txt")

	if err != nil {
		log.Fatal(err)
	}

	s1 := string(stream)

	fmt.Println(s1)
}
