package main

import (
	"end-point/db"
	"end-point/routes"
)

func main() {
	db.InitDB() // Initialize the database connection
	r := routes.SetupRouter() // Start the HTTP server with defined routes
	r.Run(":8080") // Run the server on port 8080
}