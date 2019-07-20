// 7 - Arrays / Slice

package main

import (
	"fmt"
)

func main() {

	var EvenNum[5] int

	EvenNum[0] = 0
	EvenNum[1] = 2
	EvenNum[2] = 4
	EvenNum[3] = 6
	EvenNum[4] = 8

	fmt.Println("façon longue :", EvenNum[2])

	// façon plus courte d'initialisation

	EvenNums := [5]int{0,2,4,6,8}

	fmt.Println("façon courte :", EvenNums[3])

	// boucle sur le tableau

	for _, value := range EvenNum {
		fmt.Println(value)
	}

	// slice

	numSlice := []int{5,4,3,2,1}

	slice := numSlice[3:5] // de l'index 3 à 5
	fmt.Println("slice : ", slice)

	// autre technique pour créer une slice
	slice2 := make([]int, 5, 10) // longueur 5 && capacité 10

	copy(slice2, numSlice) // copier une slice dans l'autre

	fmt.Println("slice2 : ", slice2)

	slice3 := append(numSlice, 3, 0, -1) // récupère une slice et rajoute les valeurs 3,0,-1
	fmt.Println("slice3 : ", slice3)

}
