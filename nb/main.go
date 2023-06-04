package main

import (
	"fmt"
	"log"
	"net/http"
)

const PORT = 8081

func main(){
	mux := http.NewServeMux()
	mux.HandleFunc("/", func(w http.ResponseWriter, r *http.Request){
		w.Write([]byte("<h2>Nota Bene</h2>"))
	})
	err := http.ListenAndServe(fmt.Sprintf(":%d", PORT), mux)
	if err != nil {
		log.Fatal(err)
	}
}
