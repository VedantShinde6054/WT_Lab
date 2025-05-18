import jakarta.servlet.http.*;
import jakarta.servlet.*;
import java.io.*;
import java.sql.*;

public class UpdateData extends HttpServlet {
    public void doPost(HttpServletRequest req, HttpServletResponse res)  
    throws ServletException, IOException {  
        res.setContentType("text/html");  
        PrintWriter out = res.getWriter();  
    
        int i = 0;
        int id = 0;
        String title = req.getParameter("B_title");
        String author = req.getParameter("B_author");
    
        try { 
            if (req.getParameter("B_id") != null && !req.getParameter("B_id").isEmpty()) {
                id = Integer.parseInt(req.getParameter("B_id"));
            }
    
            Double price = null;
            Integer qty = null;
    
            String priceStr = req.getParameter("B_price");
            if (priceStr != null && !priceStr.isEmpty()) {
                price = Double.parseDouble(priceStr);
            }
    
            String qtyStr = req.getParameter("B_qty");
            if (qtyStr != null && !qtyStr.isEmpty()) {
                qty = Integer.parseInt(qtyStr);
            }
    
            Class.forName("com.mysql.jdbc.Driver");
            Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/bookstore", "root", "");
    
            if (id != 0 && title != null && !title.isEmpty()) {
                if (author != null && !author.isEmpty()) {
                    PreparedStatement pst = con.prepareStatement("UPDATE ebookshop SET author=? WHERE id=? AND title=?");
                    pst.setString(1, author);
                    pst.setInt(2, id);
                    pst.setString(3, title);
                    i += pst.executeUpdate(); 
                }
    
                if (price != null) {
                    PreparedStatement pst = con.prepareStatement("UPDATE ebookshop SET price=? WHERE id=? AND title=?");
                    pst.setDouble(1, price);
                    pst.setInt(2, id);
                    pst.setString(3, title);
                    i += pst.executeUpdate(); 
                }
    
                if (qty != null) {
                    PreparedStatement pst = con.prepareStatement("UPDATE ebookshop SET quantity=? WHERE id=? AND title=?");
                    pst.setInt(1, qty);
                    pst.setInt(2, id);
                    pst.setString(3, title);
                    i += pst.executeUpdate(); 
                }
            }
    
            if (i > 0) {
                out.println("Record Successfully Updated !!");
            } else {
                out.println("No fields were updated. Please fill at least one field.");
            }
    
        } catch (Exception e) { 
            out.println("Error: " + e.getMessage());
            e.printStackTrace();
        } finally {
            out.println("<br><a href='update.html'>Go back</a>");
            out.close();  
        }
    }
    
}