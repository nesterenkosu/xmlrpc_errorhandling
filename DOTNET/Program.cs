using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using CookComputing.XmlRpc;

namespace XmlRpcClient2023Console
{
    [XmlRpcUrl("https://localhost:44302/Server.ashx")]
    public interface IDemoServiceProxy : IXmlRpcProxy
    {
        [XmlRpcMethod("demoservice::hellouser")]
        string HelloUser(string name, int age);
    }
    class Program
    {
        static void Main(string[] args)
        {
            IDemoServiceProxy proxy = XmlRpcProxyGen.Create<IDemoServiceProxy>();
            try
            {
                string response = proxy.HelloUser("Andrew", 2);
                Console.WriteLine(response);
            }
            catch(System.Net.WebException ex)
            {
                //Ошибка при передаче запроса
            }
            catch(XmlRpcServerException ex)
            {
                //Ошибка сервера
            }
            catch (XmlRpcFaultException ex)
            {
                //Штатная ошибка метода
            }
            Console.ReadLine();
        }
    }
}
