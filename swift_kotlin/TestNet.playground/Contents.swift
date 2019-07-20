//: Playground - noun: a place where people can play

import Foundation

let address = URL(string: "http://www.perdu.com")

let session = URLSession.shared

let task = session.dataTask(with: address!) { (d, r, e) in
    if e != nil {
        print(e!)
    } else if let data = d, let s = String(data: data, encoding: .utf8) {
        print(s.count)
        print(s)
    } else {
        print(r)
    }
}
task.resume()
