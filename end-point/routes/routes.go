package routes

import (
	"end-point/controllers"
	"github.com/gin-gonic/gin"
)

func SetupRouter() *gin.Engine {
	r := gin.Default()

	r.GET("/aktivitas", controllers.GetAktivitas) // Route to get all aktivitas	
	r.POST("/aktivitas", controllers.CreateAktivitas) // Route to create a new aktivitas
	r.DELETE("/aktivitas/:aktivitas_id", controllers.DeleteAktivitas) // Route to delete an aktivitas by ID
	
	r.GET("/operators", controllers.GetOperators) // Route to get all operators
	r.POST("/operators", controllers.CreateOperators) // Route to create a new operator
	r.DELETE("/operators/:operator_id", controllers.DeleteOperator) // Route to delete an operator by ID

	return r
}