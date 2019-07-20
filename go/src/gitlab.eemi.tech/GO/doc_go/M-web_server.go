// 11 - Struct
package main

import (
	"fmt"
	"net/http"
)

func main() {
	http.HandleFunc("/", handler)
	http.HandleFunc("/Hello", handler2)
	err := http.ListenAndServe(":8080", nil)
	fmt.Println(err)
}

func handler (w http.ResponseWriter, r *http.Request) {

	fmt.Println("Welcome !", r.Method)
}

func handler2 (w http.ResponseWriter, r *http.Request) {

	fmt.Println("Hello world ", r.Method)
}