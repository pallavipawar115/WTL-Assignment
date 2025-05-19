<%@ page import="java.sql.*" %>
<html>  
<body>  

<% out.print("Hello World !! Welcome to JSP"); %>
<p>Hello World !! Welcome to JSP</p>
<h1>Welcome to Sanjivani College of Engineering, IT Department</h1>

<!-- Form to Insert Data -->
<form action="" method="post">
    <h3>Insert Student Record:</h3>
    Stud_id: <input type="text" name="stud_id" required><br><br>
    Name: <input type="text" name="name" required><br><br>
    Class: <input type="text" name="class" required><br><br>
    Division: <input type="text" name="division" required><br><br>
    City: <input type="text" name="city" required><br><br>
    <input type="submit" value="Insert">
</form>

<%
try { 
    Class.forName("com.mysql.jdbc.Driver");
    Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3310/Maharashtra", "root", "");

    // Insert operation
    String stud_id = request.getParameter("stud_id");
    String name = request.getParameter("name");
    String cls = request.getParameter("class");
    String division = request.getParameter("division");
    String city = request.getParameter("city");

    if (stud_id != null && name != null && cls != null && division != null && city != null) {
        String insertQuery = "INSERT INTO student_info (Stud_id, Name, Class, Division, City) VALUES (?, ?, ?, ?, ?)";
        PreparedStatement pstmt = con.prepareStatement(insertQuery);
        pstmt.setString(1, stud_id);
        pstmt.setString(2, name);
        pstmt.setString(3, cls);
        pstmt.setString(4, division);
        pstmt.setString(5, city);

        int i = pstmt.executeUpdate();
        if(i > 0){
            out.println("<p style='color:green;'>Record Inserted Successfully!</p>");
        } else {
            out.println("<p style='color:red;'>Failed to Insert Record!</p>");
        }
    }

    // Display table
    Statement stmt = con.createStatement();
    ResultSet rs = stmt.executeQuery("SELECT * FROM student_info"); 
%>

<table border='5'>
<tr><th>Stud_id</th><th>Name</th><th>Class</th><th>Division</th><th>City</th></tr>
<%
    while(rs.next()){    
        out.println("<tr><td>"+rs.getObject(1).toString()+"</td><td>"+rs.getString(2)+"</td><td>"+rs.getString(3)+"</td><td>"+rs.getString(4)+"</td><td>"+rs.getString(5)+"</td></tr>");
    }
}catch(Exception e){ 
    out.print("<p style='color:red;'>"+e+"</p>"); 
} 
%> 
</table>

</body>  
</html>