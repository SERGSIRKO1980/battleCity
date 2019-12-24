#include <windows.h>
#include <Windowsx.h>
#include <tchar.h>
#include <string>
#include "UserConstant.h"
#include "Tank.h"
#include "Bullet.h"
#include <vector>
using namespace std;

LRESULT CALLBACK WndProc(HWND, UINT, WPARAM, LPARAM);
//--------------------------------------------------------------------------------------------------------------------------------
HINSTANCE hInstance;
vector <Bullet*> allBullets;
HWND hwnd;
Tank userTank(10, 10, 50, 50, DIRECTIONS::RIGTH, 3, NULL, NULL);
//--------------------------------------------------------------------------------------------------------------------------------

int WINAPI WinMain(HINSTANCE _hInstance, HINSTANCE hPrevInstance, PSTR szCmdLine, int iCmdShow)
{
	HINSTANCE hInstance = _hInstance;
	MSG msg;
	WNDCLASSEX wndclass;
	wndclass.cbSize = sizeof(wndclass);
	wndclass.style = CS_HREDRAW | CS_VREDRAW;
	wndclass.lpfnWndProc = WndProc;
	wndclass.cbClsExtra = 0;
	wndclass.cbWndExtra = 0;
	wndclass.hInstance = hInstance;
	wndclass.hIcon = LoadIcon(NULL, IDI_APPLICATION);
	wndclass.hCursor = LoadCursor(NULL, IDC_ARROW);
	wndclass.hbrBackground = (HBRUSH)GetStockObject(WHITE_BRUSH);
	wndclass.lpszMenuName = NULL;
	wndclass.lpszClassName = L"znoReg";
	wndclass.hIconSm = LoadIcon(NULL, IDI_APPLICATION);

	if (!RegisterClassEx(&wndclass))
	{
		MessageBox(hwnd, L"�� ������� ���������������� ����� ����", L"������ ����������� ������ ����", MB_OK);
		return 0;
	}
	//������������� ������ ����------------------------------------------------------------------------------------------------end
	hwnd = CreateWindow(
		wndclass.lpszClassName,
		L"����� ������",
		WS_OVERLAPPEDWINDOW ^ WS_THICKFRAME | WS_MAXIMIZEBOX, // WS_THICKFRAME - ������������� ������ ����
		CW_USEDEFAULT,
		CW_USEDEFAULT,
		WSCREEN,
		HSCREEN,
		NULL,
		NULL,
		hInstance,
		NULL
		);
	if (!hwnd)
	{
		MessageBox(hwnd, L"�� ������� ������� ��������� ����", L"������ �������� ���������� ����", MB_OK);
		return 0;
	}
	ShowWindow(hwnd, iCmdShow);

	UpdateWindow(hwnd);
	while (GetMessage(&msg, NULL, 0, 0))
	{
		TranslateMessage(&msg);
		DispatchMessage(&msg);
	}
	return msg.wParam;
}
LRESULT CALLBACK WndProc(HWND hwnd, UINT iMsg, WPARAM wParam, LPARAM lParam)
{
	switch (iMsg)
	{
	case WM_CREATE: {
						userTank.setHparent(hwnd);
						userTank.setHInstance(hInstance);
						userTank.showTank();
						break;
	}
	case WM_CLOSE: {
					   if (IDOK == MessageBox(hwnd, L"������ �����?", L"������� ���������", MB_OKCANCEL))
					   {
						   DestroyWindow(hwnd);
					   }
					   else {
						   return FALSE;
					   }
					   break;
	}
	case WM_KEYDOWN:{
						if (wParam == 0x41)
						{//A
							//userTank.rotateLeft();
							userTank.moveLeft();
							break;
						}
						if (wParam == 0x44)
						{//D
							//userTank.rotateRigth();
							userTank.moveRigth();
							break;
						}
						if (wParam == 0x53)
						{//S
							//userTank.rotateDown();
							userTank.moveDown();
							break;
						}
						if (wParam == 0x57)
						{//W
							//userTank.rotateUP();
							userTank.moveUP();
							break;
						}
						if (wParam == VK_SPACE)
						{
							switch (userTank.getDirection())
							{
							case DIRECTIONS::UP:{
													Bullet* b = new Bullet(userTank.getPosX() + userTank.getWidth() / 2 - 1, userTank.getPosY() - 8, DIRECTIONS::DOWN, 3, hwnd, hInstance);
													b->showBullet();
													allBullets.push_back(b);
								break;
							}
							case DIRECTIONS::DOWN:{
													  Bullet* b = new Bullet(userTank.getPosX() + userTank.getWidth()/2 -1 , userTank.getPosY() + userTank.getHeigth() + 5, DIRECTIONS::DOWN, 3, hwnd, hInstance);
													  b->showBullet();
													  allBullets.push_back(b);
													break;
							}
							case DIRECTIONS::LEFT:{
													  Bullet* b = new Bullet(userTank.getPosX() - 8, userTank.getPosY() + userTank.getHeigth() / 2 - 1, DIRECTIONS::LEFT, 3, hwnd, hInstance);
													  b->showBullet();
													  allBullets.push_back(b);
													break;
							}
							case DIRECTIONS::RIGTH:{
													   Bullet* b = new Bullet (userTank.getPosX() + userTank.getWidth() + 5, userTank.getPosY() + userTank.getHeigth() / 2 - 1, DIRECTIONS::RIGTH, 3, hwnd, hInstance);
													   b->showBullet();
													   allBullets.push_back(b);
													break;
							}
							}
							break;
						}
						break;
	}

	case WM_COMMAND:
	{

					   break;
	}
	case WM_DESTROY:
		PostQuitMessage(0);
		break;
	}
	return DefWindowProc(hwnd, iMsg, wParam, lParam);
}