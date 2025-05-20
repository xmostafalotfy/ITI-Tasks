import { Injectable, NestMiddleware } from '@nestjs/common';
import { Request, Response, NextFunction } from 'express';

@Injectable()
export class LoggerMiddleware implements NestMiddleware {
  use(req: Request, res: Response, next: NextFunction) {
    if (req.method === 'POST' && req.originalUrl === '/todo') {
      console.log(`${new Date()} ${JSON.stringify(req.body)}`);
    }
    next();
  }
}
