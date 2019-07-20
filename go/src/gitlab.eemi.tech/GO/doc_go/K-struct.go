// 11 - Struct
package main

import (
	"fmt"
)

func main() {

	// Def rect1
	rect1 := Rectangle{10,5}
	fmt.Println("height :" ,rect1.height)
	fmt.Println("width :" ,rect1.width)

	fmt.Println("Area :" ,rect1.area())

}

// Struct
type Rectangle struct {
	height float64
	width float64
}

// On définit d'aboird la struct que l'on veut pour la fonction area () puis on fait la fonction area()
func (rect *Rectangle) area() float64 {
	return rect.height * rect.width
}
