package main

import (
	"fmt"
	"io"
	"log"
	"net/http"
)

const PORT = 8081

const PAGE = `
<h2>Nota bene</h2>

<h3>Getting a directory name in Windows into the clipboard</h3>
<label><2023-07-03 Mon></label>

<h4>Powershell's <code>split-path</code></h4>

<code>
gci <QUERY> | select -ExpandProperty Directory | clip.exe
</code>


<footer>Last updated 03 Jul 2023</footer>
`

func main(){
	mux := http.NewServeMux()
	mux.HandleFunc("/", func(w http.ResponseWriter, r *http.Request){
		w.Header().Set("Content-Type", "text/html; charset=utf-8")
		io.WriteString(w, PAGE)
	})
	err := http.ListenAndServe(fmt.Sprintf(":%d", PORT), mux)
	if err != nil {
		log.Fatal(err)
	}
}
