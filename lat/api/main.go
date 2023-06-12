package main

import (
	"fmt"
	"net/http"
	"time"

	"github.com/gin-gonic/gin"
)

type Block struct {
	Sender string
	First  time.Time
	Last   time.Time
	Count  int
}
type Blocks []Block

func getBlocks(c *gin.Context) {
	dayString := c.Param("day")
	day, err := time.Parse("20060102", dayString)
	dayBlocks := Blocks{}

	for _, v := range blocks {
		if v.First.Year() == day.Year() &&
			v.First.Month() == day.Month() &&
			v.First.Day() == day.Day() {
			dayBlocks = append(dayBlocks, v)
		}
	}
	//fmt.Println("KEEPER", day)
	if err != nil {
		fmt.Println(err.Error())
	}
	c.JSON(http.StatusOK, dayBlocks)
}

func main() {
	router := gin.Default()
	fmt.Println(router)
	router.GET("/blocks/:day", getBlocks)
	router.Run("localhost:8091")
}
