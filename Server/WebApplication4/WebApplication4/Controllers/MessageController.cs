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
    public class MessageController : ControllerBase
    {
        private readonly IConfiguration _configuration;
        public MessageController(IConfiguration configuration)
        {
            _configuration = configuration;
        }


        [HttpGet]
        public JsonResult Get()
        {
            string query = @"
                            select MessageId,MessageBody,DateTime,RoomID,SenderID from
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
        public JsonResult Post(Message msg)
        {
            string query = @"
                           insert into dbo.Message
                           (MessageBody,DateTime,RoomID,SenderID)
                    values (@MessageBody,@DateTime,@RoomID,@SenderID)
                            ";

            DataTable table = new DataTable();
            string sqlDataSource = _configuration.GetConnectionString("DsAppCon");
            SqlDataReader myReader;
            using (SqlConnection myCon = new SqlConnection(sqlDataSource))
            {
                myCon.Open();
                using (SqlCommand myCommand = new SqlCommand(query, myCon))
                {
                    myCommand.Parameters.AddWithValue("@MessageBody", msg.MessageBody);
                    myCommand.Parameters.AddWithValue("@DateTime", msg.DateTime);
                    myCommand.Parameters.AddWithValue("@RoomID", msg.RoomID);
                    myCommand.Parameters.AddWithValue("@SenderID", msg.SenderID);
                    myReader = myCommand.ExecuteReader();
                    table.Load(myReader);
                    myReader.Close();
                    myCon.Close();
                }
            }

            return new JsonResult("Added Successfully");
        }



        [HttpDelete("{id}")]
        public JsonResult Delete(int MessageId)
        {
            string query = @"
                           delete from dbo.Message
                            where MessageId=@MessageId
                            ";

            DataTable table = new DataTable();
            string sqlDataSource = _configuration.GetConnectionString("DsAppCon");
            SqlDataReader myReader;
            using (SqlConnection myCon = new SqlConnection(sqlDataSource))
            {
                myCon.Open();
                using (SqlCommand myCommand = new SqlCommand(query, myCon))
                {
                    myCommand.Parameters.AddWithValue("@MessageId", MessageId);

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
