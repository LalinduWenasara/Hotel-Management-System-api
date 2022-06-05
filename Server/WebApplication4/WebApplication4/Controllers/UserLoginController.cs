using Microsoft.AspNetCore.Mvc;
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
    public class UserLoginController : ControllerBase
    {
        private readonly IConfiguration _configuration;


        public UserLoginController(IConfiguration configuration)
        {
            _configuration = configuration;
        }


        [HttpPost]
        public JsonResult Post(UserLogin usr)
        {
            string query = @"
                            SELECT [UserId]
      ,[UserFirstName]
      ,[UserLastName]
      ,[UserEmail]
      ,[UserNIC]
      ,[UserMobile]
      FROM [dbo].[User]
  Where  [UserEmail]=@UserEmail AND [UserPassword]=@UserPassword
                            ";

            DataTable table = new DataTable();
            string sqlDataSource = _configuration.GetConnectionString("DsAppCon");
            SqlDataReader myReader;
            using (SqlConnection myCon = new SqlConnection(sqlDataSource))
            {
                myCon.Open();
                using (SqlCommand myCommand = new SqlCommand(query, myCon))
                {
                    myCommand.Parameters.AddWithValue("@UserEmail", usr.UserEmail);
                    myCommand.Parameters.AddWithValue("@UserPassword", usr.UserPassword);
                    myReader = myCommand.ExecuteReader();
                    table.Load(myReader);
                  //  Console.WriteLine("Hello World");

                }
            }

            if (table.Rows.Count > 0)
            {
                return new JsonResult("loginsuccess");

            }

            else
            {
                return new JsonResult("loginnotsuccess");
            }
            /*
             return new JsonResult(table);
             Console.WriteLine("Hello World");*/
        }

    }
}
