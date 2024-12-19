#include <iostream>

using namespace std;

template <class T>
class CircularQueueArray {
    private :
        T *items;
        int rear;
        int front;
        int size;
    public :
        CircularQueueArray(int size){
            items = new T[size];  
            front = rear =-1;
            this -> size = size;
        }

        void enQueue (T data){
            if (rear != size-1 && rear != front -1){
                if(front == -1)
                    front++;
                items[++rear] = data;
            }
            else if (rear == size-1 && front != 0){
                rear = 0;
                items[rear] = data;
            }
            else if (rear == front -1 || rear == size-1) cout << "Queue is full"<<endl;

        }
    
        T deQueue(){
            if (front == -1)
                throw "Queue is empty";
            if (front == rear){
                T data = items[front];
                front = rear = -1;
                return data;
            }
            if (front == size - 1){
            T data = items[front];
            front = 0;
            return data;
            }
            T data = items[front++] ;
            return data;
        }

        T getFront(){
             if (front == -1)  throw "Queue is empty" ; return items[front]; 
        }

        T getRear(){
            if (rear == -1)  throw "Queue is empty" ; return items[rear]; 
        }

        void display(){

            if (front == -1){ cout << "Queue is empty"<<endl; return;}
            int current = front;   
            bool loopExit = false;
            do
            {
                cout<< items[current] << " --> ";
                if (current == rear) loopExit = true;
                current == size -1 ? current = 0: current++ ;
            }while (current != rear+1 && !loopExit);
            cout<<"End of Queue."<<endl;
        }
};


int main(){
/*
    CircularQueueArray<char> queue(3);
    queue.enQueue('m');
    queue.enQueue('j');
    queue.enQueue('n');
    queue.enQueue('k');

    cout<< queue.getFront()<< endl;
    cout<< queue.getRear()<< endl;

    queue.display();

    char x;
    try{
    x = queue.deQueue();
    x = queue.deQueue();
    x = queue.deQueue();
    x = queue.deQueue();


    }catch(const char * e){
        cout<< e <<endl;
    }

    cout<<x<<endl;
*/

    CircularQueueArray<int> queue(3);
    queue.enQueue(5);
    queue.enQueue(8);
    queue.enQueue(28);
    queue.enQueue(29);
    // queue.display();
    // cout<< queue.getFront()<< endl;
    // cout<< queue.getRear()<< endl;
    queue.deQueue();
    queue.deQueue();
    // queue.display();
    // cout<< queue.getFront()<< endl;
    // cout<< queue.getRear()<< endl;

    queue.enQueue(29);
    queue.enQueue(255);

    // cout<< queue.getFront()<< endl;
    // cout<< queue.getRear()<< endl;
    // queue.display();
    // cout<< queue.getFront()<< endl;
    // cout<< queue.getRear()<< endl;
    queue.enQueue(14);

    // cout<< queue.getFront()<< endl;
    // cout<< queue.getRear()<< endl;

    // queue.display();

    int x;
    try{
    x = queue.deQueue();
    x = queue.deQueue();
    x = queue.deQueue();
    


    }catch(const char * e){
        cout<< e <<endl;
    }

    cout<<x<<endl;

    return 0;
}
