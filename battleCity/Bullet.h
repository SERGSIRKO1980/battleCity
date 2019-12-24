#pragma once
#include <windows.h>
#include <Windowsx.h>
#include "UserConstant.h"

using namespace std;

class Bullet
{
private:
	int posX;
	int posY;
	int w;
	int h;
	int direction;
	int speed;
	HWND bullet;
	HWND parent;
	HINSTANCE hInstance;
	HANDLE lBitmap;
	HANDLE rBitmap;
	HANDLE uBitmap;
	HANDLE dBitmap;

	void changePosition(){
		SetWindowPos(this->bullet, HWND_TOP, this->posX, this->posY, this->w, this->h, SWP_NOSIZE);
	}
public:
	Bullet(int posX, int posY, DIRECTIONS dir, int speed, HWND parent, HINSTANCE hInstance){
		this->w = 5;
		this->h = 5;
		this->setPosX(posX);
		this->setPosY(posY);
		this->setDirection(dir);
		this->setSpeed(speed);
		this->parent = parent;
		this->hInstance = hInstance;
	}
	int getPosX(){
		return this->posX;
	}
	bool setPosX(int newX){
		if (newX >= 0 && newX < WSCREEN - this->w - 16){
			this->posX = newX;
			return true;
		}
		return false;
	}
	int getPosY(){
		return this->posY;
	}
	bool setPosY(int newY){
		if (newY >= 0 && newY < HSCREEN - this->h - 40){
			this->posY = newY;
			return true;
		}
		return false;
	}

	int getWidth(){
		return this->w;
	}
	bool setWidth(int newW){
		if (newW > 30 && newW < WSCREEN / 10 + 10){
			this->w = newW;
			return true;
		}
		return false;
	}
	int getHeigth(){
		return this->h;
	}
	bool setHeigth(int newH){
		if (newH > 30 && newH < HSCREEN / 10 + 10){
			this->h = newH;
			return true;
		}
		return false;
	}
	int getDirection() {
		return this->direction;
	}
	void setDirection(DIRECTIONS dir){
		this->direction = dir;
	}
	bool setSpeed(int newSpeed){
		if (newSpeed >= 0 && newSpeed < 30){
			this->speed = newSpeed;
			return true;
		}
		return false;
	}
	void setHparent(HWND parent){
		this->parent = parent;
	}
	void setHInstance(HINSTANCE hInstance){
		this->hInstance = hInstance;
	}
	void moveRigth() {
		if (this->setPosX(this->posX + this->speed)){
			this->changePosition();
		}
	}
	void moveLeft() {
		if (this->setPosX(this->posX - this->speed)){
			this->changePosition();
		}
	}
	void moveUP() {
		if (this->setPosY(this->posY - this->speed)){
			this->changePosition();
		}
	}
	void moveDown() {
		if (this->setPosY(this->posY + this->speed)){
			this->changePosition();
		}
	}
	HWND getHBullet() {
		return this->bullet;
	}
	void showBullet(){
		this->bullet = CreateWindow(L"static", L"", WS_CHILD | WS_BORDER | SS_BITMAP | WS_VISIBLE, this->posX, this->posY, this->w, this->h, this->parent, NULL, this->hInstance, NULL);
	}
};