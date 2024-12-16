#include <iostream>
using namespace std;

template <class T>
class Node {
public:
    T data;
    Node* prev;
    Node* next;

    Node(T data) {
        prev = NULL;
        next = NULL;
        this->data = data;
    }
};

template <class T>
class LinkedList {
public:
    Node<T>* head;
    Node<T>* tail;
    int size;

    LinkedList() {
        head = NULL;
        tail = NULL;
        size = 0;
    }

    Node<T>* searchData(T data) {
        Node<T>* search = head;
        while (search != NULL) {
            if (search->data == data) {
                return search;
            }
            search = search->next;
        }
        return NULL;
    }

    void insert(T data) {
        Node<T>* newNode = new Node<T>(data);

        if (size == 0) {
            head = newNode;
            tail = newNode;
        } else {
            newNode->prev = tail;
            tail->next = newNode;
            tail = newNode;
        }
        size++;
    }

    int getCount() {
        return size;
    }

    int getDataByIndex(int index, T& result) {
        Node<T>* curr = head;
        int i = 0;

        if (index < size) {
            for (int i = 0; i < index; i++) {
                curr = curr->next;
            }
            result = curr->data;
            return 1;
        } else {
            cout << "Out of Range" << endl;
            return -1;
        }
    }

    void display() {
        Node<T>* curr = head;
        if (curr == NULL) {
            cout << "No Data in linkedList" << endl;
        } else {
            while (curr != NULL) {
                cout << curr->data << "->";
                curr = curr->next;
            }
            cout << endl;
        }
    }

    int insertAfter(T data, T afterData) {
        Node<T>* newNode = new Node<T>(data);
        Node<T>* curr = searchData(afterData);
        if (curr == NULL) {
            delete newNode;
            return -1;
        }
        size++;
        newNode->next = curr->next;
        newNode->prev = curr;

        if (newNode->next == NULL) {
            tail = newNode;
        } else {
            curr->next->prev = newNode;
        }
        curr->next = newNode;
        return 1;
    }

    int insertBefore(T data, T beforeData) {
        Node<T>* newNode = new Node<T>(data);
        Node<T>* curr = searchData(beforeData);
        if (curr == NULL) {
            delete newNode;
            return -1;
        }
        size++;
        newNode->next = curr;
        newNode->prev = curr->prev;

        if (curr->prev == NULL) {
            head = newNode;
        } else {
            curr->prev->next = newNode;
        }

        curr->prev = newNode;
        return 1;
    }
};

int main() {
    LinkedList<int> list;

    list.insert(10);
    list.insert(20);
    list.insert(30);
    list.display(); 

    list.insertAfter(25, 20);
    list.display(); 

    list.insertBefore(5, 10);
    list.display(); 


    return 0;
}
