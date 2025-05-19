import jakarta.servlet.http.*;  
import jakarta.servlet.*;  
import java.io.*; 
import java.sql.*;  
public class DemoServlet extends HttpServlet{  
public void doGet(HttpServletRequest req,HttpServletResponse res)  
throws ServletException,IOException  
{  
res.setContentType("text/html");//setting the content type  
PrintWriter pw=res.getWriter();//get the stream to write the data   
pw.println("<html><body>");
pw.println("Welcome to Pragati eBookShop");  
pw.println("<table border='5'>");  
pw.println("<tr><th>Book id</th><th>Book Title</th><th>Book Author</th><th>Book Price</th><th>Quantity</th></tr>");
try{ 
Class.forName("com.mysql.jdbc.Driver");
 
Connection con=DriverManager.getConnection("jdbc:mysql://localhost:3306/pragati","root","");

Statement stmt=con.createStatement();

ResultSet rs=stmt.executeQuery("select * from ebookshop"); 
while(rs.next()){    
//writing html in the stream  
pw.println("<tr><td>"+rs.getObject(1).toString()+"</td><td>"+rs.getString(2)+"</td><td>"+rs.getString(3)+"</td><td>"+rs.getDouble(4)+"</td><td>"+rs.getInt(5)+"</td></tr>");

}
}catch(Exception e){ pw.print(e);} 
pw.println("</table>");
pw.println("</body></html>");    
pw.close();//closing the stream  
}}  