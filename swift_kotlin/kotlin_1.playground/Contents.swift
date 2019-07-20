// Intro Kotlin
/*
 val = let en swift
 
 interpolation de chaine
 val a = 3
 var s = "$a"
 
 null en kotlin
 
 var a : Int?
 a = 3 ou a = null
 
 Elvis operator :? same que ?? in swift

 .! => .!! en kotlin
 
 Démo :
 
 fun fibo(v: Int?) : Int? {
 if (v == null || v < 0) { return null }
 if (v <= 1) { return v }
 
 return fibo(v-2)!! + fibo(v-1)!!
 }
 
 fun main() {
 printLn( fibo(13) )
 }
 
 val l1 = listOf(1,2,3) => liste
 
 l1[0] => accès à la liste
 
 for (i in 4 downTo 1 step 2) print (i) = 4 2
 
 mutuableListOf => similaire à un tableau
 
 open class Truc { on pourra en hériter }
 
 constructeur
 Il instancie
 
 class Personne(p: String, n:String) {
 var prenom = p
 var nom = n
 }
 
 Génériques
 
*/
func minimum<T: Comparable>(_ array: [T]) -> T? {
    guard var minimum = array.first else {
        return nil
    }
    
    for element in array.dropFirst() {
        minimum = element < minimum ? element : minimum
    }
    return minimum
}

func maximum<T: Comparable>(_ array: [T]) -> T? {
    guard var maximum = array.first else {
        return nil
    }
    
    for element in array.dropFirst() {
        maximum = element > maximum ? element : maximum
    }
    return maximum
}

let m = [1,2,3]
maximum(m)

func combSort (input: [Int]) -> [Int] {
    var copy: [Int] = input
    var gap = copy.count
    let shrink = 1.3
    
    while gap > 1 {
        gap = (Int)(Double(gap) / shrink)
        if gap < 1 {
            gap = 1
        }
        
        var index = 0
        while !(index + gap >= copy.count) {
            if copy[index] > copy[index + gap] {
                copy.swapAt(index, index + gap)
            }
            index += 1
        }
    }
    return copy
}
combSort(input: [1,24,5,6])
