package models;

import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;

public class DataService {
    
    Database database;
    Connection con;

    public DataService(Database database){
        this.database = database;
        con = this.database.connect();

    }

    public ArrayList<Product> getProduct(){
        ArrayList<Product> proList = null;
        try{
            proList = trygetProducts();
        }catch (SQLException e){
            System.err.println("Hiba! lekérdezés sikertelen!");
        }
        return proList;
    }

    public ArrayList<Product> trygetProducts() throws SQLException{
        String sql = "select * from product";
        Statement statement = this.con.createStatement();

        ResultSet resultSet = statement.executeQuery(sql);

        ArrayList<Product> productList = new ArrayList<>();

        while(resultSet.next()){
            Product product = new Product();
            //át ítni a megbeszélt adatokra
            Product.id = resultSet.getInt("id");
            Product.name = resultSet.getString("name");
            Product.itemNumber = resultSet.getString("itemNumber");
            Product.count = resultSet.getInt("count");
            Product.price = resultSet.getDouble("price");

            productList.add(product);
        }

        return productList;
        
    }
}
