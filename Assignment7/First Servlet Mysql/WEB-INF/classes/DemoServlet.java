import jakarta.servlet.http.*;
import jakarta.servlet.*;
import java.io.*;
import java.sql.*;

public class DemoServlet extends HttpServlet {
        public void doGet(HttpServletRequest req, HttpServletResponse res)
                        throws ServletException, IOException {
                res.setContentType("text/html");// setting the content type
                PrintWriter pw = res.getWriter();// get the stream to write the data
                pw.println("<html><head>");
                pw.println("<style>");
                pw.println("body { font-family: Arial, sans-serif; background: #f0f2f5; padding: 40px; }");
                pw.println("h1 { text-align: center; color: #333; }");
                pw.println("table { width: 90%; margin: auto; border-collapse: collapse; background-color: #fff; box-shadow: 0 0 10px rgba(0,0,0,0.1); }");
                pw.println("th, td { padding: 12px 15px; text-align: center; border: 1px solid #ccc; }");
                pw.println("th { background-color: #007bff; color: white; }");
                pw.println("tr:nth-child(even) { background-color: #f9f9f9; }");
                pw.println("a { display: inline-block; margin: 20px 10px; text-decoration: none; color: #007bff; font-weight: bold; }");
                pw.println("a:hover { color: #0056b3; }");
                pw.println("</style>");
                pw.println("</head><body>");
                pw.println("<center><h1>Welcome to eBookShop</h1></center>");
                pw.println("<table border='5'>");
                pw.println("<tr><th>Book id</th><th>Book Title</th><th>Book Author</th><th>Book Price</th><th>Quantity</th></tr>");
                try {
                        Class.forName("com.mysql.jdbc.Driver");

                        Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/bookstore", "root",
                                        "");

                        Statement stmt = con.createStatement();

                        ResultSet rs = stmt.executeQuery("select * from ebookshop");
                        while (rs.next()) {
                                // writing html in the stream
                                pw.println("<tr><td>" + rs.getObject(1).toString() + "</td><td>" + rs.getString(2)
                                                + "</td><td>" + rs.getString(3) + "</td><td>" + rs.getDouble(4)
                                                + "</td><td>" + rs.getInt(5) + "</td></tr>");

                        }
                } catch (Exception e) {
                        pw.print(e);
                }
                pw.println("</table>");
                pw.println("<a href=\"/InsertRecord/index.html\">Insert Records</a>\r\n" + //
                                "    <a href=\"/InsertRecord/delete.html\">Delete Records</a>");
                pw.println("</body></html>");
                pw.close();// closing the stream
        }
}