#include <iostream>
using namespace std;

template <class T>
class Node{
  public :
    T data;
    Node *next;
    Node (int data){
      this -> data = data;
      next = NULL;
    }
};
template <class T>
class QueueLinkedList{
    private :
        Node<T> * front ;
        Node<T> * rear ;
    public :
        QueueLinkedList(){
            rear = front = NULL;
        }
        void enQueue (T data){
            Node<T> * newNode = new Node<T>(data);
            if (front == NULL){
            rear = front = newNode;
            return ;
            }
            rear -> next = newNode;
            rear = newNode;
        }
    
        T deQueue(){
            T data ;
            if (front == NULL)
            throw "Queue is empty";
            
            Node<T> * temp = front;
            data = front -> data;
            
            front = front -> next;
            if (front == NULL)  rear = NULL;

            delete temp;
            return data ;
        }

        T getFront(){
             if (front == NULL)  throw "Queue is empty" ; return front -> data; 
        }

        T getRear(){
            if (rear == NULL)  throw "Queue is empty" ; return rear -> data; 
        }

        void display(){

            if (front == NULL) throw "Queue is empty";
            Node<T> * current = front;
            while (current != NULL){
                cout<< current -> data << " --> ";
                current = current -> next;
            }
            front == NULL ?cout<< "Queue is empty"<<endl : cout<<"End of Queue."<<endl;
        }

};

int main(){


    QueueLinkedList<int> queue;
    queue.enQueue(5);
    queue.enQueue(8);
    cout<< queue.getFront()<< endl;
    cout<< queue.getRear()<< endl;

    queue.display();
    int x;
    try{
    x = queue.deQueue();
    x = queue.deQueue();
    x = queue.deQueue();
    //queue.display();

    }catch(const char * e){
        cout<< e <<endl;
    }

    cout<<x<<endl;

    QueueLinkedList<char> queue1;
    queue1.enQueue('a');
    queue1.enQueue('v');
    cout<< queue1.getFront()<< endl;
    cout<< queue1.getRear()<< endl;

    queue1.display();

    char x1;
    try{
    x1 = queue1.deQueue();
    x1 = queue1.deQueue();
    x1 = queue1.deQueue();

    }catch(const char * e){
        cout<< e <<endl;
    }

    cout<<x1<<endl;

    return 0;
}
