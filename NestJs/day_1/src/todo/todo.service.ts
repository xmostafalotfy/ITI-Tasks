import { Injectable } from '@nestjs/common';

export enum Status {
  IN_PROGRESS = 'in_progress',
  DONE = 'done',
}

export interface Todo {
  id?: number;
  task: string;
  status: Status;
}

@Injectable()
export class TodoService {
  private todo: Todo[] = [];

  create(task: string, status: Status) {
    const lastItem = this.todo.at(-1);
    const id = lastItem?.id ? lastItem.id + 1 : 1;
    const newObject = {
      id: id,
      task,
      status,
    };
    this.todo.push(newObject);
  }

  findAll(): Todo[] {
    return this.todo;
  }

  findOne(id: number) {
    return this.todo.find((todo) => todo.id === id);
  }

  update(id: number, updated: Todo) {
    this.todo = this.todo.map((elem) => {
      if (elem.id == id) {
        return { ...updated, id: elem.id };
      } else return elem;
    });
  }

  remove(id: number) {
    this.todo = this.todo.filter((elem) => id != elem.id);
  }
}
