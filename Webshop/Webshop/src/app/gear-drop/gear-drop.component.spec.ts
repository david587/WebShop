import { ComponentFixture, TestBed } from '@angular/core/testing';

import { GearDropComponent } from './gear-drop.component';

describe('GearDropComponent', () => {
  let component: GearDropComponent;
  let fixture: ComponentFixture<GearDropComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ GearDropComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(GearDropComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
