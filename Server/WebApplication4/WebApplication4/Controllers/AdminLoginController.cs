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
    public class AdminLoginController : ControllerBase
    {
        private readonly IConfiguration _configuration;
      

        public AdminLoginController(IConfiguration configuration)
        {
            _configuration = configuration;
        }


        [HttpPost]
        public JsonResult Post(AdminLogin adm)
        {
            string query = @"
                            select Email from
                            dbo.Admin
                            where Email=@Email AND Password=@Password 
                            ";

            DataTable table = new DataTable();
            string sqlDataSource = _configuration.GetConnectionString("DsAppCon");
            SqlDataReader myReader;
            using (SqlConnection myCon = new SqlConnection(sqlDataSource))
            {
                myCon.Open();
                using (SqlCommand myCommand = new SqlCommand(query, myCon))
                {
                    myCommand.Parameters.AddWithValue("@Email", adm.Email);
                    myCommand.Parameters.AddWithValue("@Password", adm.Password);
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
