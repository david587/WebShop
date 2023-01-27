package models;

import java.sql.Connection;
import java.sql.SQLException;

public interface Database {

    public Connection connect();
    public void close(Connection con);

}
