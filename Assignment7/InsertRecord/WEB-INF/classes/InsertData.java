import jakarta.servlet.http.*;
import jakarta.servlet.*;
import java.io.*;
import java.sql.*;

public class InsertData extends HttpServlet {
public void doPost(HttpServletRequest req,HttpServletResponse res)  
throws ServletException,IOException  
{  
res.setContentType("text/html");//setting the content type  
PrintWriter out =res.getWriter();//get the stream to write the data   
int id = Integer.parseInt(req.getParameter("B_id"));
String title = req.getParameter("B_title");
String author = req.getParameter("B_author");;
double price = Double.parseDouble(req.getParameter("B_price"));
int qty = Integer.parseInt(req.getParameter("B_qty"));

try{ 
Class.forName("com.mysql.jdbc.Driver");
 
Connection con=DriverManager.getConnection("jdbc:mysql://localhost:3306/bookstore","root","");

PreparedStatement pst =con.prepareStatement("INSERT INTO ebookshop VALUES(?,?,?,?,?)");
pst.setInt(1, id);
pst.setString(2, title);
pst.setString(3, author);
pst.setDouble(4, price);
pst.setInt(5, qty);

int i =pst.executeUpdate(); 
if(i > 0){
    out.println("Record Successfully Inserted !!");
}
}catch(Exception e)
{ 
    System.out.println(e);
} 

finally{
    out.println("<a href="+"index.html"+">Go back</a>");
}

out.close();//closing the stream  
}
}