package views;

import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.scene.control.Label;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.layout.VBox;
import models.DataService;
import models.Product;

public class MainView extends VBox{
    Label porLabel;
    DataService datService;
    TableView<Product> tableView;

    public MainView(){
        porLabel = new Label("Termékek");
        
        
    }

    private void initTable(){
        tableView = new TableView<Product>();

        TableColumn<Product, Integer> idCol = new TableColumn<>("id");
        idCol.setMinWidth(50);
        idCol.setCellValueFactory(new PropertyValueFactory<>("id"));

        TableColumn<Product, String> nameCol = new TableColumn<>("name");
        nameCol.setMinWidth(50);
        nameCol.setCellValueFactory(new PropertyValueFactory<>("name"));

        TableColumn<Product, String> itemCol = new TableColumn<>("itemNumber");
        itemCol.setMinWidth(50);
        itemCol.setCellValueFactory(new PropertyValueFactory<>("itemNumber"));

        TableColumn<Product, String> countCol = new TableColumn<>("quantity");
        countCol.setMinWidth(50);
        countCol.setCellValueFactory(new PropertyValueFactory<>("count"));

        TableColumn<Product, Double> priCol = new TableColumn<>("price");
        priCol.setMinWidth(50);
        priCol.setCellValueFactory(new PropertyValueFactory<>("price"));

        tableView.setItems(this.getProducts());

        tableView.getColumns().add(idCol);
        tableView.getColumns().add(nameCol);
        tableView.getColumns().add(itemCol);
        tableView.getColumns().add(countCol);
        tableView.getColumns().add(priCol);
        

    }

    private ObservableList<Product> getProducts() {
        ObservableList<Product> proList = FXCollections.observableArrayList(restapi());
        return proList;
    }

    

    
}
