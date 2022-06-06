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
    public class MessageForRoomController : ControllerBase
    {
        private readonly IConfiguration _configuration;
        public MessageForRoomController(IConfiguration configuration)
        {
            _configuration = configuration;
        }


        [HttpGet]
        public JsonResult Get()
        {
            string query = @"
                            select DISTINCT RoomID from
                            dbo.Message
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
        public JsonResult Post(MessageForRoom msg)
        {
            string query = @"
                            select * from
                            dbo.Message
                            where RoomID=@RoomID ORDER BY DateTime ASC";

            DataTable table = new DataTable();
            string sqlDataSource = _configuration.GetConnectionString("DsAppCon");
            SqlDataReader myReader;
            using (SqlConnection myCon = new SqlConnection(sqlDataSource))
            {
                myCon.Open();
                using (SqlCommand myCommand = new SqlCommand(query, myCon))
                {
                    myCommand.Parameters.AddWithValue("@RoomID", msg.RoomID);
                    myReader = myCommand.ExecuteReader();
                    table.Load(myReader);
                   // Console.WriteLine("Hello World");

                }
            }

            
             return new JsonResult(table);
             
        }




    }
}
