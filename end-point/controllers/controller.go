package controllers

import (
	"end-point/db"
	"end-point/models"
	"net/http"

	"github.com/gin-gonic/gin"
)

// GetAktivitas retrieves all aktivitas from the database
func GetAktivitas(c *gin.Context) {
	rows, err := db.DB.Query("SELECT id, operator_id, nama_alat, lokasi, aktivitas, jam_mulai, jam_selesai, status, created_at FROM aktivitas")
	if err != nil {
		c.JSON(http.StatusInternalServerError, gin.H{"error": "Gagal mengambil data aktivitas"})
		return
	}
	defer rows.Close()

	var data []models.Aktivitas
	for rows.Next() {
		var a models.Aktivitas
		if err := rows.Scan(&a.ID, &a.OperatorID, &a.NamaAlat, &a.Lokasi, &a.Aktivitas, &a.JamMulai, &a.JamSelesai, &a.Status, &a.CreatedAt); 
		err != nil {
			c.JSON(http.StatusInternalServerError, gin.H{"error": "Gagal memproses data aktivitas"})
			return
		}
		data = append(data, a)
	}

	// Handle case where no data is found
	if len(data) == 0 {
		c.JSON(http.StatusOK, gin.H{"message": "Data kosong", "data": []models.Aktivitas{}})
		return
	}	

	c.JSON(http.StatusOK, data)
}

// CreateAktivitas creates a new aktivitas in the database
func CreateAktivitas(c *gin.Context) {
	var a models.Aktivitas
	if err := c.ShouldBindJSON(&a); err != nil {
		c.JSON(http.StatusBadRequest, gin.H{"error": "Invalid input"})
		return
	}

	query := "INSERT INTO aktivitas (operator_id, nama_alat, lokasi, aktivitas, jam_mulai, jam_selesai, status) VALUES (?, ?, ?, ?, ?, ?, ?)"
	_, err := db.DB.Exec(query, a.OperatorID, a.NamaAlat, a.Lokasi, a.Aktivitas, a.JamMulai, a.JamSelesai, a.Status)
	if err != nil {
		c.JSON(http.StatusInternalServerError, gin.H{"error": "Gagal menyimpan aktivitas"})
		return
	}

	c.JSON(http.StatusCreated, gin.H{"message": "Aktivitas berhasil dibuat"})
}

func DeleteAktivitas(c *gin.Context) {
	aktivitasID := c.Param("aktivitas_id")
	
	if aktivitasID == "" {
		c.JSON(http.StatusBadRequest, gin.H{"error": "ID aktivitas tidak boleh kosong"})
		return
	}

	query := "DELETE FROM aktivitas WHERE id = ?"
	_, err := db.DB.Exec(query, aktivitasID)
	if err != nil {
		c.JSON(http.StatusInternalServerError, gin.H{"error": "Gagal menghapus aktivitas"})
		return
	}

	c.JSON(http.StatusOK, gin.H{"message": "Aktivitas berhasil dihapus"})
}
//Operators

func GetOperators(c *gin.Context) {
	rows, err := db.DB.Query("SELECT id, nama, operator_id, jabatan, created_at FROM operators")
	if err != nil {
		c.JSON(http.StatusInternalServerError, gin.H{"error": "Gagal mengambil data operator"})
		return
	}
	defer rows.Close()

	var data []models.Operators
	for rows.Next() {
		var a models.Operators
		if err := rows.Scan(&a.ID, &a.Nama, &a.OperatorID, &a.Jabatan, &a.CreatedAt); 
		err != nil {
			c.JSON(http.StatusInternalServerError, gin.H{"error": "Gagal memproses data operator"})
			return
		}
		data = append(data, a)
	}

	// Handle case where no data is found
	if len(data) == 0 {
		c.JSON(http.StatusOK, gin.H{"message": "Data kosong", "data": []models.Operators{}})
		return
	}

	c.JSON(http.StatusOK, data)
}	
	

func CreateOperators(c *gin.Context) {
	var a models.Operators
	if err := c.ShouldBindJSON(&a); err != nil {
		c.JSON(http.StatusBadRequest, gin.H{"error": "Invalid input"})
		return
	}

	query := "INSERT INTO operators (nama, operator_id, jabatan) VALUES (?, ?, ?)"
	_, err := db.DB.Exec(query, a.Nama, a.OperatorID, a.Jabatan)
	if err != nil {
		c.JSON(http.StatusInternalServerError, gin.H{"error": "Gagal menyimpan operator"})
		return
	}

	c.JSON(http.StatusCreated, gin.H{"message": "Operator berhasil dibuat"})
}


func DeleteOperator(c *gin.Context) {
	operatorID := c.Param("operator_id")
	if operatorID == "" {
		c.JSON(http.StatusBadRequest, gin.H{"error": "ID operator tidak boleh kosong"})
		return
	}

	query := "DELETE FROM operators WHERE operator_id = ?"
	_, err := db.DB.Exec(query, operatorID)
	if err != nil {
		c.JSON(http.StatusInternalServerError, gin.H{"error": "Gagal menghapus operator"})
		return
	}

	c.JSON(http.StatusOK, gin.H{"message": "Operator berhasil dihapus"})
}