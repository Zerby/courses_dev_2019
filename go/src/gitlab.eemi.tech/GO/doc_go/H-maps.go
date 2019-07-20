// 8 - Maps

// Maps est similaire au dictionnaire

package main

import (
	"fmt"
)

func main() {

	StudentAge := make(map[string] int)

	StudentAge["Max"] = 23
	StudentAge["Sarah"] = 19
	StudentAge["Frédéric"] = 48

	fmt.Println("Frédéric :", StudentAge["Frédéric"]) // accéder à une valeur

	fmt.Println("taille map :", len(StudentAge))

}
