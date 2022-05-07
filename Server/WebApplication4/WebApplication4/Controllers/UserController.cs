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
    public class UserController : ControllerBase
    {
        private readonly IConfiguration _configuration;
        public UserController(IConfiguration configuration)
        {
            _configuration = configuration;
        }


        [HttpGet]
        public JsonResult Get()
        {
            string query = @"
                            SELECT [UserId]
      ,[UserFirstName]
      ,[UserLastName]
      ,[UserEmail]
      ,[UserNIC]
      ,[UserMobile]
      FROM [dbo].[User]
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
        public JsonResult Post(User usr)
        {
            string query = @"
                           insert into dbo.User
                           (UserFirstName,UserLastName,UserEmail,UserNIC,UserMobile,UserPassword)
                    values (@UserFirstName,@UserLastName,@UserEmail,@UserNIC,@UserMobile,@UserPassword)
                            ";

            DataTable table = new DataTable();
            string sqlDataSource = _configuration.GetConnectionString("DsAppCon");
            SqlDataReader myReader;
            using (SqlConnection myCon = new SqlConnection(sqlDataSource))
            {
                myCon.Open();
                using (SqlCommand myCommand = new SqlCommand(query, myCon))
                {
                  
                    myCommand.Parameters.AddWithValue("@UserFirstName", usr.UserFirstName);
                    myCommand.Parameters.AddWithValue("@UserLastName", usr.UserLastName);
                    myCommand.Parameters.AddWithValue("@UserEmail", usr.UserEmail);
                    myCommand.Parameters.AddWithValue("@UserNIC", usr.UserNIC);
                    myCommand.Parameters.AddWithValue("@UserMobile", usr.UserMobile);
                    myCommand.Parameters.AddWithValue("@UserPassword", usr.UserMobile);
                    myReader = myCommand.ExecuteReader();
                    table.Load(myReader);
                    myReader.Close();
                    myCon.Close();
                }
            }

            return new JsonResult("Added Successfully");
        }



        [HttpPut]
        public JsonResult Put(User usr)
        {
            string query = @"
                           update dbo.User
                           set UserId= @UserId,
                            UserFirstName=@UserFirstName,
                            UserLastName=@UserLastName,
                            UserFirstName=@UserFirstName,
                            UserNIC=@UserNIC,
                            UserEmail=@UserEmail
                            UserPassword=@UserPassword
                            where UserId=@UserId
                            ";

            DataTable table = new DataTable();
            string sqlDataSource = _configuration.GetConnectionString("DsAppCon");
            SqlDataReader myReader;
            using (SqlConnection myCon = new SqlConnection(sqlDataSource))
            {
                myCon.Open();
                using (SqlCommand myCommand = new SqlCommand(query, myCon))
                {
                    myCommand.Parameters.AddWithValue("@UserId", usr.UserId);
                    myCommand.Parameters.AddWithValue("@UserFirstName", usr.UserFirstName);
                    myCommand.Parameters.AddWithValue("@UserLastName", usr.UserLastName);
                    myCommand.Parameters.AddWithValue("@UserEmail", usr.UserEmail);
                    myCommand.Parameters.AddWithValue("@UserNIC", usr.UserNIC);
                    myCommand.Parameters.AddWithValue("@UserMobile", usr.UserMobile);
                    myCommand.Parameters.AddWithValue("@UserPassword", usr.UserMobile);
                    myReader = myCommand.ExecuteReader();
                    table.Load(myReader);
                    myReader.Close();
                    myCon.Close();
                }
            }

            return new JsonResult("Updated Successfully");
        }

        [HttpDelete("{id}")]
        public JsonResult Delete(int UserId)
        {
            string query = @"
                           delete from dbo.User
                            where UserId=@UserId
                            ";

            DataTable table = new DataTable();
            string sqlDataSource = _configuration.GetConnectionString("DsAppCon");
            SqlDataReader myReader;
            using (SqlConnection myCon = new SqlConnection(sqlDataSource))
            {
                myCon.Open();
                using (SqlCommand myCommand = new SqlCommand(query, myCon))
                {
                    myCommand.Parameters.AddWithValue("@UserId", UserId);

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
