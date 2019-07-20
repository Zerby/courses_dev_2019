// 4 - Printf

package main

import (
	"fmt"
)

func main() {
	name := "Arrya Paul"
	pi := 3.1234567
	win := true
	x := 5

	fmt.Printf("%f \n", pi) // f pour float
	fmt.Printf("%.3 \n", pi) // %.3 permet de s'arrêter à la 3è position du float
	fmt.Printf("%T \n", name) // T pour le type
	fmt.Printf("%t \n", win) // t pour les bools
	fmt.Printf("%d \n", win) // d pour les int
	fmt.Printf("%b \n", x) // b pour le binaire

}
