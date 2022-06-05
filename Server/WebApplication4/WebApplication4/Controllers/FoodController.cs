using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Logging;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using System.Data.SqlClient;
using Microsoft.Extensions.Configuration;
using System.Data;
using WebApplication4.Model;

namespace WebApplication4.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class FoodController : ControllerBase
    {

        private readonly IConfiguration _configuration;
        public FoodController(IConfiguration configuration)
        {
            _configuration = configuration;
        }


        [HttpGet]
        public JsonResult Get()
        {
            string query = @"
                            SELECT [FoodId]
      ,[Title]
      ,[Availability]
      ,[Price]
  FROM [dbo].[Food]
                            ";

            DataTable table = new DataTable();
            string sqlDataSource = _configuration.GetConnectionString("DsAppCon");
            SqlDataReader myReader;
            using (SqlConnection myCon = new SqlConnection(sqlDataSource))
            {
                myCon.Open();
                using (SqlCommand myCommand = new SqlCommand(query, myCon))
                {
                    myReader = myCommand.ExecuteReader();
                    table.Load(myReader);
                    myReader.Close();
                    myCon.Close();
                }
            }

            return new JsonResult(table);
        }

        [HttpPost]
        public JsonResult Post(Food food)
        {
            string query = @"
                           INSERT INTO [dbo].[Food]
           ([Title]
           ,[Availability]
           ,[Price])
                    values (@Title,@Availability,@Price)
                            ";

            DataTable table = new DataTable();
            string sqlDataSource = _configuration.GetConnectionString("DsAppCon");
            SqlDataReader myReader;
            using (SqlConnection myCon = new SqlConnection(sqlDataSource))
            {
                myCon.Open();
                using (SqlCommand myCommand = new SqlCommand(query, myCon))
                {
                    myCommand.Parameters.AddWithValue("@Title", food.Title);
                    myCommand.Parameters.AddWithValue("@Availability", food.Availability);
                    myCommand.Parameters.AddWithValue("@Price", food.Price);
                    myReader = myCommand.ExecuteReader();
                    table.Load(myReader);
                    myReader.Close();
                    myCon.Close();
                }
            }

            return new JsonResult("Added Successfully");
        }





        [HttpPut]
        public JsonResult Put(Food food)
        {
            string query = @"
                           update dbo.[Food]
                           set FoodId= @FoodId,
                            Availability=@Availability,
                            Price=@Price,
                            Where FoodId=@FoodId
                            ";

            DataTable table = new DataTable();
            string sqlDataSource = _configuration.GetConnectionString("DsAppCon");
            SqlDataReader myReader;
            using (SqlConnection myCon = new SqlConnection(sqlDataSource))
            {
                myCon.Open();
                using (SqlCommand myCommand = new SqlCommand(query, myCon))
                {
                    myCommand.Parameters.AddWithValue("@FoodId", food.FoodId);
                    myCommand.Parameters.AddWithValue("@Availability", food.Availability);
                    myCommand.Parameters.AddWithValue("@Price", food.Price);
                    myReader = myCommand.ExecuteReader();
                    table.Load(myReader);
                    myReader.Close();
                    myCon.Close();
                }
            }

            return new JsonResult("Updated Successfully");
        }







        [HttpDelete("{FoodId}")]
        public JsonResult Delete(int FoodId)
        {
            string query = @"
                           delete from dbo.[Food]
                            where FoodId=@FoodId
                            ";

            DataTable table = new DataTable();
            string sqlDataSource = _configuration.GetConnectionString("DsAppCon");
            SqlDataReader myReader;
            using (SqlConnection myCon = new SqlConnection(sqlDataSource))
            {
                myCon.Open();
                using (SqlCommand myCommand = new SqlCommand(query, myCon))
                {
                    myCommand.Parameters.AddWithValue("@FoodId", FoodId);

                    myReader = myCommand.ExecuteReader();
                    table.Load(myReader);
                    myReader.Close();
                    myCon.Close();
                }
            }

            return new JsonResult("Deleted Successfully");
        }

























    }
}
