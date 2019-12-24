#pragma once
#include <windows.h>
#include <Windowsx.h>
#include "UserConstant.h"

using namespace std;

class Tank
{
private:

	int posX;
	int posY;
	int w;
	int h;
	int direction;
	int speed;
	HWND tank;
	HWND parent;
	HINSTANCE hInstance;
	HANDLE lBitmap;
	HANDLE rBitmap;
	HANDLE uBitmap;
	HANDLE dBitmap;

	void changePosition(){
		
		SetWindowPos(this->tank, HWND_TOP, this->posX, this->posY, this->w, this->h, SWP_NOSIZE);
	}
public:
	Tank(int posX, int posY, int w, int h, DIRECTIONS dir, int speed, HWND parent, HINSTANCE hInstance){
		this->setPosX(posX);
		this->setPosY(posY);
		this->setWidth(w);
		this->setHeigth(h);
		this->setDirection(dir);
		this->setSpeed(speed);
		this->parent = parent;
		this->hInstance = hInstance;

		this->rBitmap = LoadImage(this->hInstance, L"tankRIGTH.bmp", IMAGE_BITMAP, this->w, this->h, LR_LOADFROMFILE);
		this->uBitmap = LoadImage(this->hInstance, L"tankUP.bmp", IMAGE_BITMAP, this->w, this->h, LR_LOADFROMFILE);
		this->lBitmap = LoadImage(this->hInstance, L"tatnkLEFT.bmp", IMAGE_BITMAP, this->w, this->h, LR_LOADFROMFILE);
		this->dBitmap = LoadImage(this->hInstance, L"tankDOWN.bmp", IMAGE_BITMAP, this->w, this->h, LR_LOADFROMFILE);

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
		if (newY >= 0 && newY < HSCREEN - this->h-40){
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
	HWND getHTank() {
		return this->tank;
	}
	void showTank(){
		this->tank = CreateWindow(L"static", L"", WS_CHILD | WS_BORDER | SS_BITMAP|WS_VISIBLE, this->posX, this->posY, this->w, this->h, this->parent, NULL, this->hInstance, NULL);
		switch (this->direction)
		{
		case UP:
			this->rotateUP();
			break;
		case RIGTH:
			this->rotateRigth();
			break;
		case DOWN:
			this->rotateDown();
			break;
		case LEFT:
			this->rotateLeft();
			break;
		default:
			break;
		}
	}
	void setHparent(HWND parent){
		this->parent = parent;
	}
	void setHInstance(HINSTANCE hInstance){
		this->hInstance = hInstance;
	}
	void rotateRigth(){
		this->direction = DIRECTIONS::RIGTH;
		SendMessage(this->tank, STM_SETIMAGE, IMAGE_BITMAP, (LPARAM)this->rBitmap);
	}
	void rotateLeft(){
		this->direction = DIRECTIONS::LEFT;
		SendMessage(this->tank, STM_SETIMAGE, IMAGE_BITMAP, (LPARAM)this->lBitmap);
	}
	void rotateUP(){
		this->direction = DIRECTIONS::UP;
		SendMessage(this->tank, STM_SETIMAGE, IMAGE_BITMAP, (LPARAM)this->uBitmap);
	}
	void rotateDown(){
		this->direction = DIRECTIONS::DOWN;
		SendMessage(this->tank, STM_SETIMAGE, IMAGE_BITMAP, (LPARAM)this->dBitmap);
	}
	void moveRigth() {
		this->rotateRigth();
		if (this->setPosX(this->posX + this->speed)){
			this->changePosition();
		}	
	}
	void moveLeft() {
		this->rotateLeft();
		if (this->setPosX(this->posX - this->speed)){
			this->changePosition();
		}
	}
	void moveUP() {
		this->rotateUP();
		if (this->setPosY(this->posY - this->speed)){
			this->changePosition();
		}
	}
	void moveDown() {
		this->rotateDown();
		if (this->setPosY(this->posY + this->speed)){
			this->changePosition();
		}
	}
};