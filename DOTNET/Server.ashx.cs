using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using CookComputing.XmlRpc;

namespace XmlRpcServer2023
{
    /// <summary>
    /// Сводное описание для Server
    /// </summary>
    public class Server : XmlRpcService
    {
       [XmlRpcMethod("demoservice::hellouser")]
       public string HelloUser(string name, int age)
       {
            if (age < 18)
                throw new XmlRpcFaultException(1, "Детям нельзя!");
            
            return "Добро пожаловать, " + name + "!";
       }
    }
}