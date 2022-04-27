
import controller.Controller;
import model.Model;
import view.View;

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */


public class ProgramaNagusia {
    public static void main(String[] args) {
        View view = View.viewaSortuBistaratu();

        Model model = new Model();

        Controller controller = new Controller(model, view);
    }
}
