//
//  ViewController.swift
//  clown_1097
//
//  
//

import UIKit

class ViewController: UIViewController {
    
    @IBOutlet weak var tableView: UITableView!
    
    @IBAction func distanceButton(_ sender: Any) {
        tab.sort {
            $0.distance < $1.distance
        }
        tableView.reloadData()
    }
    
    
    @IBAction func tarifButton(_ sender: Any) {
        tab.sort {
            $0.tarif < $1.tarif
        }
        tableView.reloadData()
    }
    
    var tab = [Clown]()
    
    var clown1 = Clown(nom: "Paul", tarif: 8, distance: 5)
    var clown2 = Clown(nom: "Marc", tarif: 23, distance: 3)
    var clown3 = Clown(nom: "Maxime", tarif: 67, distance: 2)
    var clown4 = Clown(nom: "Jean", tarif: 14, distance: 1)
    

    override func viewDidLoad() {
        super.viewDidLoad()
        tab = [clown1, clown2, clown3, clown4]
        // Do any additional setup after loading the view, typically from a nib.
    }
    
}

extension ViewController: UITableViewDataSource {
    func tableView(_ tableView: UITableView, numberOfRowsInSection section: Int) -> Int {
        return tab.count
    }
    
    func tableView(_ tableView: UITableView, cellForRowAt indexPath: IndexPath) -> UITableViewCell {
        let cell = tableView.dequeueReusableCell(withIdentifier: "clownCell", for: indexPath)
        let name = tab[indexPath.row].nom
        cell.textLabel?.text = name
        
        let tarif = tab[indexPath.row].tarif
        let distance = tab[indexPath.row].distance
        cell.detailTextLabel?.text = "distance : " + String(distance) + " prix : " + String(tarif) + "€"
        return cell
    }
    
    
}



