import jakarta.servlet.http.*;
import jakarta.servlet.*;
import java.io.*;
import java.sql.*;

public class DelData extends HttpServlet {
public void doPost(HttpServletRequest req,HttpServletResponse res)  
throws ServletException,IOException  
{  
res.setContentType("text/html");//setting the content type  
PrintWriter out =res.getWriter();//get the stream to write the data   
int id = Integer.parseInt(req.getParameter("book-id"));
String title = req.getParameter("book-title");

try{ 
Class.forName("com.mysql.jdbc.Driver");
 
Connection con=DriverManager.getConnection("jdbc:mysql://localhost:3306/bookstore","root","");

PreparedStatement pst =con.prepareStatement("DELETE FROM ebookshop WHERE id=? AND title =?");
pst.setInt(1, id);
pst.setString(2, title);

int i =pst.executeUpdate(); 
if(i > 0){
    out.println("Record Deleted Successfully !!");
}
else{
    out.println("Failure , Record Not Found !");
}
}catch(Exception e)
{ 
    System.out.println(e);
} 

finally{
    out.println("<a href="+"delete.html"+">Go back</a>");
}
  
out.close();//closing the stream  
}
}