// 10 - Defer, recover, panic

// Defer = dernière exécution
// Recover = retour à la normale après une panic
// Panic = Montre les erreurs, exceptions

package main

import "fmt"

func main() {

	// exemple Defer
	defer firstRun()
	secondRun()

	// exemple Recover
	fmt.Println(div(3,1))
	fmt.Println(div(3,5))

	// exemple Panic
	demPanic()

}

func firstRun() { fmt.Println("Exécuté en premier")}
func secondRun() { fmt.Println("Exécuté en deuxième")}

// Exemple Recover

func div (num1, num2 int) int {
	defer func() {
		fmt.Println(recover())
	}()
	solution := num1/num2

	return solution

}

// Exemple Panic

func demPanic () {
	defer func() {
		fmt.Println(recover())
	}()
}
