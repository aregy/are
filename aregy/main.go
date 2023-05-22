package main

import (
	"io"
	"net/http"
)

const landing = `
<h2>Areg Yeghnazar</h2>

<ul>
	<li>PGP</li>
	<li>Public Repos</h2>
	<li>Blog</h2>
	<li>Log</h2>
</ul>
<footer>Last updated 27 April 2023</footer>
`

func main() {

	var handler, nameHandler func(http.ResponseWriter, *http.Request)
	handler = func(res http.ResponseWriter, req *http.Request) {
		res.Header().Set("Content-Type", "text/html; charset=utf-8")
		io.WriteString(res, landing)
	}
	nameHandler = func(res http.ResponseWriter, req *http.Request) {
		io.WriteString(res, string("Right back at you, ")+req.URL.Path[len("/name/"):] + ".\n")
	}
	http.HandleFunc("/", handler)
	http.HandleFunc("/name/", nameHandler)

	http.ListenAndServe(":8083", nil)
}
