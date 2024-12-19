#include <iostream>

using namespace std;
template <class T>
class Node{
    public:
        T data;
        Node * prev = NULL;
        Node(T data){
            this -> data = data;
        }

};

template <class T>
class CircularQueueArray {
    private :
        Node<T> * tail ;
    public :
        CircularQueueArray(){
            tail = NULL;
        }

        void push(T data){
            Node<T> * newNode = new Node<T>(data);
            if (tail == NULL){
                tail = newNode;
                return ;
            }
            newNode -> prev = tail;
            tail = newNode;
        }
        T pop(){
            if (tail == NULL)
                throw "Stack is empty";

            Node<T> * temp = tail;
            tail = tail -> prev;
            int data = temp -> data ;
            delete temp;
            return data;
        }

        T peek(){
        if (tail==NULL)
            throw "Stack is empty";
        return tail -> data;
        }

        void display(){
            Node<T> *current = tail;
            while(current != NULL){
                cout<< current -> data << " --> ";
                current = current -> prev;
            }
            tail == NULL ?cout<< "Stack is empty"<<endl : cout<<"End of stack."<<endl;
        }


};

int main(){

    CircularQueueArray<int> stack;
    stack.push(5);
    stack.push(8);
    stack.peek();
    stack.display();
    int x;
    try{
    x = stack.pop();
    x = stack.pop();
    x = stack.pop();
    //stack.peek();

    }catch(const char * e){
        cout<< e <<endl;
    }
    stack.display();
    cout<<x<<endl;

    CircularQueueArray<char> stack1;
    stack1.push('a');
    stack1.push('v');
    stack1.peek();
    stack1.display();
    char x1;
    try{
    x1 = stack1.pop();
    x1 = stack1.pop();
    x1 = stack1.pop();
    //stack.peek();

    }catch(const char * e){
        cout<< e <<endl;
    }

    cout<<x1<<endl;

    return 0;
}
