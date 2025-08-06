package db

import (
	"database/sql"
	"log"

	_ "github.com/go-sql-driver/mysql"
)

var DB *sql.DB

func InitDB() {
	var err error
	DB, err = sql.Open("mysql", "root:@tcp(localhost:3306)/try")
	if err != nil {
		log.Fatal("Gagal membuka koneksi ke database: ", err)
	}
	if err = DB.Ping(); err != nil {
		log.Fatal("Gagal melakukan ping ke database: ", err)
	}
}	