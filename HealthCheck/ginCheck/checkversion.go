//please do not edit this file,it is auto created by go generate
package ginCheck

import (
	"github.com/gin-gonic/gin"
)

// gin框架健康检查
func HealthCheck(ctx *gin.Context) {
	ctx.JSON(200, map[string]interface{}{
		"code":    0,
		"alive":   true,
		"version": "2019-07-14 11:28",
	})
}
