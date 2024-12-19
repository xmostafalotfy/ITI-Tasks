#include <iostream>

using namespace std;

template <class T>
class CircularQueueArray {
    private :
        T *items;
        int tail;
        int size;
    public :
        CircularQueueArray(int size){
            items = new T[size];  
            tail = -1;
            this -> size = size;
        }

        void push(T data){
            if (tail == size - 1){
                cout<< "stack is full"<<endl;
                return ;
            }
            items[++tail] = data;
        }
        T pop(){
            if (tail == -1)
                throw "Stack is empty";
            T data = items[tail--] ;
            return data;
        }

        T peek(){
        if (tail==-1)
            throw "Stack is empty";
        return items[tail];
        }

        void display(){
            for (int i = tail; i >= 0; i--){
                cout<< items[i] << " --> ";
            }
            tail == -1 ?cout<< "Stack is empty"<<endl : cout<<"End of stack."<<endl;
        }


};

int main(){

    CircularQueueArray<int> stack(2);
    stack.push(5);
    stack.push(8);
    stack.push(7);
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

    CircularQueueArray<char> stack1(2);
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
